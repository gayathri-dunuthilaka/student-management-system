<template>
    <div>
      <h1>Students</h1>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Age</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="student in students" :key="student.id">
            <td>{{ student.id }}</td>
            <td>{{ student.name }}</td>
            <td>{{ student.image }}</td>
            <td>{{ student.age }}</td>
            <td>{{ student.status }}</td>
            <td class="actions">
              <button @click="editStudent(student.id)" class="edit">Edit</button>
              <button @click="deleteStudent(student.id)" class="delete">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  import { usePage } from '@inertiajs/inertia-vue'
  
  export default {
    props: {
      students: Array
    },
    methods: {
      editStudent(id) {
        this.$inertia.visit(`/students/${id}/edit`)
      },
      deleteStudent(id) {
        if (confirm('Are you sure you want to delete this student?')) {
          this.$inertia.delete(`/students/${id}`)
        }
      }
    }
  }
  </script>
  
  <style scoped>
  /* Include the previously defined CSS styles */
  /* CSS for table */
  .table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  .table th,
  .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }
  
  .table th {
    background-color: #f2f2f2;
  }
  
  /* Table Hover Effect */
  .table tbody tr:hover {
    background-color: #f9f9f9;
  }
  
  /* Table Actions */
  .table .actions button {
    margin-right: 5px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
  }
  
  .table .actions button.edit {
    background-color: #3490dc;
    color: white;
  }
  
  .table .actions button.delete {
    background-color: #e3342f;
    color: white;
  }
  </style>
  