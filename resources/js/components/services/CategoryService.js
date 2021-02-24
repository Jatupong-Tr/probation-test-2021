import http from '../services/httpClient';

class CategoryService {
  getAll() {
    return http.get('/q1/categories');
  }
}

export default new CategoryService();