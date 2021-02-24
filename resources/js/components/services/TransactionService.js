import http from '../services/httpClient';

class TransactionService {
  getAll() {
    return http.get('/q1/transactions');
  }
  create(data) {
    return http.post('/q1/transactions', data);
  }
}

export default new TransactionService();