<template>
	<a-tabs v-model:activeKey="activeKey" tab-position="left">
		<a-tab-pane key="1" tab="Item">Content of Tab Pane 1</a-tab-pane>
		<a-tab-pane key="2" tab="Supplier" force-render>Content of Tab Pane 2</a-tab-pane>
		<a-tab-pane key="3" tab="Customer">Content of Tab Pane 3</a-tab-pane>
	</a-tabs>
</template>
<script setup>
import { ref } from 'vue'

const activeKey = ref('1')
</script>