<template>
  <div class="container">
    <h1>📝 Lista de Tareas</h1>
    <form @submit.prevent="agregar">
      <input v-model="form.titulo" placeholder="Nueva tarea..." required />
      <button type="submit">Agregar</button>
    </form>
    <ul>
      <li v-for="tarea in tareas" :key="tarea.id" :class="{ completada: tarea.completada }">
        <span @click="toggle(tarea)">{{ tarea.titulo }}</span>
        <button @click="eliminar(tarea)">🗑️</button>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
const props = defineProps({ tareas: Array });
const form = useForm({ titulo: '' });
const agregar  = () => form.post('/tareas', { onSuccess: () => form.reset() });
const toggle   = (t) => form.patch(`/tareas/${t.id}`);
const eliminar = (t) => form.delete(`/tareas/${t.id}`);
</script>

<style scoped>
.container { max-width: 500px; margin: 2rem auto; font-family: sans-serif; }
.completada span { text-decoration: line-through; color: #999; }
input { padding: .5rem; width: 70%; }
button { padding: .5rem 1rem; margin-left: .5rem; cursor: pointer; }
li { display: flex; justify-content: space-between; padding: .5rem 0; border-bottom: 1px solid #eee; }
</style>