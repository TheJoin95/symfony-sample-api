import React from 'react';
import { Route } from 'react-router-dom';
import { List, Show } from '../components/category/';

export default [
  <Route path="/categories/show/:id" component={Show} exact key="show" />,
  <Route path="/categories/" component={List} exact strict key="list" />,
];
