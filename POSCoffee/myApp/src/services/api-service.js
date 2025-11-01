import axios from 'axios';

// Create an axios instance with a base URL
const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/', // your API base URL
  timeout: 10000, // optional: timeout in ms
});

// You can also add interceptors here if needed
// api.interceptors.request.use(config => {...});

export default api;