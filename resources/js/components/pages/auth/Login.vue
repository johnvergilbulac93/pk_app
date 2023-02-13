<script setup>
import { onMounted, computed, reactive } from "vue";
import { useStore } from "vuex";

const store = useStore()
const form = reactive({
	username: '',
	password: ''
})
const handleLogin = () => {
	const payload = {
		username: form.username,
		password: form.password
	}
	store.dispatch('User/login', payload)
}

</script>
<template>
	<div class="h-screen w-full flex justify-center items-center">
		<div class="w-1/4  bg-gray-100 flex flex-col items-center p-4 rounded-md">
			<label for="title" class="flex items-center my-4 text-gray-600 font-semibold text-2xl">Peanut
				Kisses</label>
			<div class="p-2 space-y-2">
				<a-input placeholder="Username" required v-model:value="form.username">
					<template #prefix>
						<UserOutlined style="color: rgba(0, 0, 0, 0.25)" />
					</template>
				</a-input>
				<a-input-password type="password" placeholder="Password" required v-model:value="form.password">
					<template #prefix>
						<LockOutlined style="color: rgba(0, 0, 0, 0.25)" />
					</template>
				</a-input-password>
			</div>
			<div class="flex justify-between items-center w-full p-4">
				<a-button type="link">Forgot Password?</a-button>
				<a-button type="primary" @click="handleLogin">Sign In</a-button>
			</div>
		</div>
	</div>
</template>
