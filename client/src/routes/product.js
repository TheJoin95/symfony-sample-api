import React from 'react';
import { Route } from 'react-router-dom';
import { List, Show } from '../components/product/';

export default [
  <Route path="/products/show/:id" component={Show} exact key="show" />,
  <Route path="/" component={List} exact strict key="list" />
];
