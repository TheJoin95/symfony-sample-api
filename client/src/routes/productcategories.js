import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/productcategories/';

export default [
  <Route path="/product_categories/create" component={Create} exact key="create" />,
  <Route path="/product_categories/edit/:id" component={Update} exact key="update" />,
  <Route path="/product_categories/show/:id" component={Show} exact key="show" />,
  <Route path="/product_categories/" component={List} exact strict key="list" />,
  <Route path="/product_categories/:page" component={List} exact strict key="page" />
];
