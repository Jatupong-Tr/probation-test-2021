<template>
  <div>
    <h4>Transaction</h4>
    <div>
      <label>categoty</label>
      <select v-model="transaction.category_id">
        <option v-for="category in categories" v-bind:key="category.id">{{category.id}}</option>
      </select>
      <label>Value: {{category.category_name}}</label> <br>
      <label>amount</label>
      <input type="text" v-model="transaction.amount"> <br>
      <label>note</label>
      <textarea v-model="transaction.note"></textarea>
      <button @click="submit()">Add</button>
    </div>
    <div>
      <table class="tabel table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>category</th>
            <th>amount</th>
            <th>note</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="transaction in transactionsData" v-bind:key="transaction.id">
            <td>{{ transaction.created_at }}</td>
            <td>{{ transaction.category.category_name }}</td>
            <td>{{ transaction.amount }}</td>
            <td>{{ transaction.note }}</td>
            <td>
              <button>save</button>
              <button>delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script>

import Axios from 'axios';
import TransactionService from '../services/TransactionService';

export default {
  data() {
    return {
      transactionsData: [],
      categories:[],
      category: {
        id: null,
        category_name: ""
      },
      transaction: {
        id: null,
        category_id: null,
        amount: "",
        note: ""
      }
    }
  },
  created() {
    Axios.get('http://127.0.0.1:8000/api/q1/transactions')
      .then(({data}) => {
        this.transactionsData = data.transactions
        console.log('data', this.transactionsData)
      })
    Axios.get('http://127.0.0.1:8000/api/q1/categories')
      .then(({data}) => {
        this.categories = data.categories
        console.log('data', this.categories)
      })
  },
  methods: {
    submit() {
      var data = {
        category_id: this.transaction.category_id,
        amount: this.transaction.amount,
        note: this.transaction.note
      }
      TransactionService.create(data)
        .then(response => {
          this.transaction.id = response.data.id
          console.log(response.data);
          location.reload();
        })
    }
  }
}
</script>