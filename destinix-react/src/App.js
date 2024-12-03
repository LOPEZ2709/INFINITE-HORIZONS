// src/App.js
import React from "react";
import { Routes, Route } from "react-router-dom";
import Index from "./pages/index";
import Login from "./pages/login";
import { Dashboard } from "./services/api";
import Empresa from "./pages/empresa";
import Restored from "./pages/restored";

const App = () => {
  return (
    <Routes>
      <Route path="/" element={<Index />} />
      <Route path="/login" element={<Login />} />
      <Route path="/dashboard" element={<Dashboard />} />
      <Route path="/empresa" element={<Empresa />} />
      <Route path="/restored" element={<Restored/>} />
    </Routes>
  );
};

export default App;
