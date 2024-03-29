<template>
  <div>
    <h1>Edit Student</h1>
    <form @submit.prevent="submitForm">
      <div>
        <label>Name:</label>
        <input type="text" v-model="form.name">
      </div>
      <div>
        <label>Age:</label>
        <input type="number" v-model="form.age">
      </div>
      <div>
        <label>Status:</label>
        <select v-model="form.status">
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <div>
        <button type="submit">Save</button>
      </div>
    </form>
  </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue'

export default {
  props: {
    student: Object
  },
  setup(props) {
    const { data, setData, put } = useForm({
      name: props.student.name,
      age: props.student.age,
      status: props.student.status
    })

    const submitForm = () => {
      put(`/students/${props.student.id}`, data)
    }

    return {
      form: data,
      submitForm
    }
  }
}
</script>
