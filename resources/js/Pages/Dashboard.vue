<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3'

defineProps({
  posts: Array,
  title: String
})

const form = useForm({})

const deletePost = (id) => {
  form.delete(route('dashboard.delete', { post: id }))
}

const editPost = (id) => {
  form.get(route('dashboard.edit', { post: id }))
}
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ title }}</h2>
        <Link :href="route('dashboard.create')" class="bg-indigo-600 px-3 py-2 rounded text-gray-50">Criar post</Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div v-for="post in posts" class="flex flex-col gap-3">
          <div class="flex items-end justify-between bg-gray-200 px-3 py-3 rounded mt-4">
            <div>
              <h1 class="text-xl font-semibold text-gray-800">{{ post.title }}</h1>
              <p class="text-sm font-normal text-gray-900">{{ post.content }}</p>
            </div>
            <div>
              <button @click="deletePost(post.id)" class="text-gray-50 bg-red-600 px-3 py-2 rounded mr-2">Deletar</button>
              <button @click="editPost(post.id)" class="text-gray-50 bg-gray-600 px-3 py-2 rounded">Editar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
