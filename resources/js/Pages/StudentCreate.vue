<template>
    <div>
      <h1>{{ formTitle }}</h1>
      <form @submit.prevent="submitForm" class="form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" v-model="form.name" id="name" required>
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" @change="onFileChange" id="image">
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <input type="number" v-model="form.age" id="age" required>
        </div>
        <div class="form-group">
          <label for="status">Status:</label>
          <select v-model="form.status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit">{{ submitText }}</button>
          <button type="button" @click="cancel" class="cancel">Cancel</button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/inertia-vue'
  
  export default {
    setup() {
      const { data, setData, post, put } = useForm({
        name: '',
        image: null,
        age: '',
        status: 'active'
      })
  
      const submitForm = () => {
        if (form.id) {
          put(`/students/${form.id}`, data)
        } else {
          post('/students', data)
        }
      }
  
      const onFileChange = (e) => {
        const file = e.target.files[0]
        setData('image', file)
      }
  
      const cancel = () => {
        // Redirect or handle cancel action
      }
  
      return {
        form: data,
        submitForm,
        onFileChange,
        cancel
      }
    },
    computed: {
      formTitle() {
        return this.form.id ? 'Edit Student' : 'Add Student'
      },
      submitText() {
        return this.form.id ? 'Update' : 'Save'
      }
    }
  }
  </script>
  
  <style scoped>
  /* Include the previously defined CSS styles */
  /* CSS for form */
  .form {
    max-width: 500px;
    margin: 0 auto;
  }
  
  .form-group {
    margin-bottom: 20px;
  }
  
  .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
  }
  
  .form-group input[type="text"],
  .form-group input[type="number"],
  .form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  .form-group select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    padding: 8px 30px 8px 10px;
    background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="10" height="5"><path d="M0 0l5 5 5-5z"/></svg>') no-repeat;
    background-position: right 10px center;
    background-size: 10px 5px;
  }
  
  .form-group input[type="file"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  
  .form-group button {
    padding: 10px 20px;
    background-color: #3490dc;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .form-group button.cancel {
    background-color: #e3342f;
  }
  
  .form-group button:disabled {
    opacity: 0.6;
    cursor: not-allowed;
  }
  </style>
  