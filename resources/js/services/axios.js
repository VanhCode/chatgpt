import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000';
axios.defaults.headers.common['Accept'] = 'application/json';

// axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;

export default axios;
