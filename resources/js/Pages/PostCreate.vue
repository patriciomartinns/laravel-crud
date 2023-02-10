<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
  posts: Array,
  title: String
})

const form = useForm({
  title: '',
  content: ''
});

const submitPost = () => {
  form.post(route('dashboard.store'), {
    onSuccess: () => {
      form.reset()
    }
  })
}
</script>

<template>
  <Head title="Post Create" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criando um post</h2>
        <Link :href="route('dashboard')" class="bg-indigo-600 px-3 py-2 rounded text-gray-50">Voltar</Link>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="submitPost" class="space-y-3">
          <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
            <div class="mt-1">
              <input v-model="form.title" type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Titulo do seu post" />
              <p class="text-red-600 mt-1 text-sm">{{ form.errors.title }}</p>
            </div>
          </div>

          <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Conteudo do post</label>
            <div class="mt-1">
              <input v-model="form.content" type="text" name="content" id="content" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Digite uma coisa legal" />
              <p class="text-red-600 mt-1 text-sm">{{ form.errors.content }}</p>
            </div>
          </div>

          <div>
            <PrimaryButton type="submit">Salvar</PrimaryButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
