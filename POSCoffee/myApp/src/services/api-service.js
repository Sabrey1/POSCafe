import axios from 'axios';

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL;

const API_TIMEOUT = import.meta.env.VITE_API_TIMEOUT
  ? parseInt(import.meta.env.VITE_API_TIMEOUT, 10)
  : 10000;

const api = axios.create({
  baseURL: API_BASE_URL,
  timeout: API_TIMEOUT,
});

// Request interceptor
api.interceptors.request.use(
  config => config,
  error => Promise.reject(error)
);

// Response interceptor
api.interceptors.response.use(
  response => response,
  error => {
    console.error(
      'API Error:',
      error.response?.data || error.message
    );

    return Promise.reject(error);
  }
);

// Custom API methods
const app = {
  getApi: async (url, config = {}) => {
    const response = await api.get(url, config);
    return response.data;
  },

  postApi: async (url, data = {}, config = {}) => {
    const response = await api.post(url, data, config);
    return response.data;
  },

  putApi: async (url, data = {}, config = {}) => {
    const response = await api.put(url, data, config);
    return response.data;
  },

  patchApi: async (url, data = {}, config = {}) => {
    const response = await api.patch(url, data, config);
    return response.data;
  },

  deleteApi: async (url, config = {}) => {
    const response = await api.delete(url, config);
    return response.data;
  },
};

export default app;