import axios from 'axios';

// Read values from .env
const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;
const API_TIMEOUT = import.meta.env.VITE_API_TIMEOUT
  ? parseInt(import.meta.env.VITE_API_TIMEOUT)
  : 10000; // default fallback

// Create axios instance
const api = axios.create({
  baseURL: API_BASE_URL,
  timeout: API_TIMEOUT,
});

// Optional: Request interceptor
api.interceptors.request.use(config => {
  // For example, add an Authorization header if needed
  // config.headers['Authorization'] = `Bearer ${import.meta.env.VITE_API_KEY}`;
  return config;
}, error => Promise.reject(error));

// Optional: Response interceptor
api.interceptors.response.use(
  response => response,
  error => {
    console.error('API Error:', error);
    return Promise.reject(error);
  }
);

export default api;


// VITE_API_BASE_URL=http://127.0.0.1:8000/api/
// VITE_API_TIMEOUT=10000