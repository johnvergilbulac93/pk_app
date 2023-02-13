<template>
	<a-layout>
		<a-layout-header :style="{ position: 'fixed', zIndex: 1, width: '100%' }">
			<div class=" flex items-center  justify-between">
				<div class=" flex items-center w-1/2  justify-between">
					<div class="flex items-center gap-4">
						<img class="w-14" src="/images/pk.png" />
						<span class="font-semibold">PK Invoicing System</span>
					</div>
					<div class="flex gap-4 item-center ">
						<router-link to="/dashboard" :class="[
							$route.name === 'dashboard' ? 'text-blue-600' : 'text-gray-800',
						]">
							<span class="font-semibold"> Dashboard</span>
						</router-link>
						<a-dropdown>
							<a class="font-semibold text-gray-800" @click.prevent>
								Masterfile
								<DownOutlined />
							</a>
							<template #overlay>
								<a-menu>
									<a-menu-item key="1">
										<router-link to="/item">
											<span> Item</span>
										</router-link>
									</a-menu-item>
									<a-menu-item key="2">
										<router-link to="/customer">
											<span> Customer</span>
										</router-link>
									</a-menu-item>
									<a-menu-item key="3">
										<router-link to="/supplier">
											<span> Supplier</span>
										</router-link>
									</a-menu-item>
								</a-menu>
							</template>
						</a-dropdown>
						<a-dropdown>
							<a class="font-semibold text-gray-800">
								Transaction
								<DownOutlined />
							</a>
							<template #overlay>
								<a-menu>
									<a-menu-item key="1">Sales Order</a-menu-item>
									<a-menu-item key="2">Sales Invoice</a-menu-item>
									<a-menu-item key="3">Customer Return</a-menu-item>
								</a-menu>
							</template>
						</a-dropdown>
						<a-dropdown>
							<a class="font-semibold text-gray-800" @click.prevent>
								Report
								<DownOutlined />
							</a>
							<template #overlay>
								<a-menu>
									<a-menu-item key="1">Sales Per Customer</a-menu-item>
									<a-menu-item key="2">Sales Per Item</a-menu-item>
									<a-menu-item key="3">Ledger Summary</a-menu-item>
								</a-menu>
							</template>
						</a-dropdown>

					</div>
					<!-- <a-menu mode="horizontal" :style="{ lineHeight: '64px' }">
						<a-menu-item key="1" :style="{ backgroundColor: '#e2e8f0' }">
							<router-link to="/dashboard" :class="[
								$route.name === 'dashboard' ? 'ant-menu-item-selected' : '',
							]">
								<span class="font-semibold"> Dashboard</span>
							</router-link></a-menu-item>
						<a-menu-item key="2" :style="{ backgroundColor: '#e2e8f0' }">
							<router-link to="/dashboard" :class="[
								$route.name === 'dashboard' ? 'ant-menu-item-selected' : '',
							]">
								<span class="font-semibold"> DASHBBOARD</span>
							</router-link></a-menu-item>
					</a-menu> -->
				</div>
				<div class="flex gap-6">
					<div class="flex  items-center gap-1 font-semibold">
						<UserOutlined /> <span>Janbee</span>
					</div>
					<button type="link" class="font-semibold cursor-pointer" @click="handleLogout">Logout</button>
				</div>
			</div>
		</a-layout-header>
		<a-layout-content :style="{ padding: '0 50px', marginTop: '80px' }">
			<!-- <a-breadcrumb :style="{ margin: '50x 0' }">
				<a-breadcrumb-item>Home</a-breadcrumb-item>
				<a-breadcrumb-item>List</a-breadcrumb-item>
				<a-breadcrumb-item>App</a-breadcrumb-item>
			</a-breadcrumb> -->
			<div :style="{ background: '#fff', padding: '24px' }" class="rounded"><router-view /></div>
		</a-layout-content>
		<a-layout-footer :style="{ textAlign: 'center', fontStyle: Bold }" class="font-semibold r ">
			PK Invoicing System ©2022 Created by AGC
		</a-layout-footer>
	</a-layout>
</template>
<script setup>
import { useStore } from 'vuex';


const store = useStore()

const handleLogout = () => {
	store.dispatch('User/logout')
}
</script>
<style>
#components-layout-demo-fixed .logo {
	width: 120px;
	height: 31px;
	background: rgba(255, 255, 255, 0.2);
	margin: 16px 24px 16px 0;
	float: left;
}

.site-layout .site-layout-background {
	background: #fff;
}

[data-theme='dark'] .site-layout .site-layout-background {
	background: #141414;
}
</style>