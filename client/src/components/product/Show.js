import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Link, Redirect } from 'react-router-dom';
import PropTypes from 'prop-types';
import { retrieve, reset } from '../../actions/product/show';

class Show extends Component {
  static propTypes = {
    retrieved: PropTypes.object,
    loading: PropTypes.bool.isRequired,
    error: PropTypes.string,
    eventSource: PropTypes.instanceOf(EventSource),
    retrieve: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
    deleteError: PropTypes.string,
    deleteLoading: PropTypes.bool.isRequired,
    deleted: PropTypes.object,
    del: PropTypes.func.isRequired
  };

  componentDidMount() {
    this.props.retrieve(decodeURIComponent(this.props.match.params.id));
  }

  componentWillUnmount() {
    this.props.reset(this.props.eventSource);
  }

  render() {
    if (this.props.deleted) return <Redirect to=".." />;

    const item = this.props.retrieved;

    return (
      <div>
        <h1>Product - {item && item['name']}</h1>

        {this.props.loading && (
          <div className="alert alert-info" role="status">
            Loading...
          </div>
        )}
        {this.props.error && (
          <div className="alert alert-danger" role="alert">
            <span className="fa fa-exclamation-triangle" aria-hidden="true" />{' '}
            {this.props.error}
          </div>
        )}

        {item && (
          <table className="table table-responsive table-striped table-hover">
            <thead>
              <tr>
                <th>Field</th>
                <th>Value</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">code</th>
                <td>{item['code']}</td>
              </tr>
              <tr>
                <th scope="row">name</th>
                <td>{item['name']}</td>
              </tr>
              <tr>
                <th scope="row">description</th>
                <td>{item['description']}</td>
              </tr>
              <tr>
                <th scope="row">image</th>
                <td>{item['image']}</td>
              </tr>
              <tr>
                <th scope="row">categories</th>
                <td>{this.renderLinks('categories', item['categories'])}</td>
              </tr>
            </tbody>
          </table>
        )}
        <Link to="/">
          Back to list
        </Link>
      </div>
    );
  }

  renderLinks = (type, items) => {
    if (Array.isArray(items)) {
      return items.map((item, i) => (
        <div key={i}>{this.renderLinks(type, item)}</div>
      ));
    }

    return (
      <Link to={`/${type}/show/${encodeURIComponent(items['@id'])}`}>{items['name']}</Link>
    );
  };
}

const mapStateToProps = state => ({
  retrieved: state.product.show.retrieved,
  error: state.product.show.error,
  loading: state.product.show.loading,
  eventSource: state.product.show.eventSource
});

const mapDispatchToProps = dispatch => ({
  retrieve: id => dispatch(retrieve(id)),
  reset: eventSource => dispatch(reset(eventSource))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(Show);
