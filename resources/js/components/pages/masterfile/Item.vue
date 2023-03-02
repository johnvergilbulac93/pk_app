<template>
	<a-card title="Item Masterfile List">
		<template #extra><a href="#"> <a-button type="primary">Create</a-button></a></template>
		<div class="my-2 w-1/4">
			<a-input-search v-model:value="form.search" placeholder="search item" enter-button="Search" />
		</div>
		<a-table bordered :data-source="items.data" :columns="columns" :pagination="false">
			<template #bodyCell="{ column, record }">
				<template v-if="column.key === 'operation'">
					<div class="flex items-center gap-2">
						<a-button @click="handlePacking(record)" type="link">Packing</a-button>
						<a-button @click="handlePrice(record)" type="link">Price</a-button>
						<a-button type="link">Edit</a-button>
					</div>
				</template>
			</template></a-table>
		<div class=" flex items-center justify-between mt-1">
			<span>{{ items.from ? items.from : items.total }} - {{ items.to ? items.to : items.total }} of
				{{ items.total }}</span>

			<a-pagination size="small" :total="items.total" show-size-changer show-quick-jumper @change="onChange"
				@showSizeChange="onShowLimit" :current="form.page" />
		</div>

	</a-card>
	<ModalPacking :itemcode="itemcode" :visible="visible" @cancel="visible = false" :title="title" />
	<ModalPrice :itemcode="itemcode" :visible="visible2" @cancel="visible2 = false" :title="title" />

</template>
<script setup>

import { ref, onMounted, watch, computed, reactive, toRefs } from 'vue';
import { useStore } from 'vuex';
import { debounce } from 'lodash'
import ModalPacking from './components/Modal-Packing.vue';
import ModalPrice from './components/Modal-Price.vue';


const store = useStore()
const form = reactive({
	page: 1,
	limit: 10,
	search: "",
});
const visible = ref(false)
const visible2 = ref(false)

const title = ref('')
const itemcode = ref('')
const columns = [{
	title: 'Code',
	dataIndex: 'itm_code',
	width: '10%',
}, {
	title: 'Description',
	dataIndex: 'itm_desc',
}, {
	title: 'Action',
	width: '20%',
	key: 'operation',
}];

watch(form, debounce(() => {
	index()
}, 500))
const index = () => {
	store.dispatch('Item/index', form)
}
const onShowLimit = (current, pageSize) => {
	const { limit } = toRefs(form);
	const { page } = toRefs(form);
	page.value = 1;
	limit.value = pageSize;
	index();
};
const onChange = (payload) => {
	const { page } = toRefs(form);
	page.value = payload;
	index();
};
const handlePacking = (payload) => {
	visible.value = true
	title.value = `${payload.itm_code} - ${payload.itm_desc}`
	itemcode.value = payload.itm_code
	store.dispatch('Item/showPacking', { itemcode: payload.itm_code })
}
const handlePrice =( payload) => {
	visible2.value = true
	title.value = `${payload.itm_code} - ${payload.itm_desc}`
	itemcode.value = payload.itm_code
	store.dispatch('Option/getPackingPerItem', { itemcode: payload.itm_code })
}
const options = () => {
	store.dispatch('Option/getPriceGroup')
}
onMounted(index)
onMounted(options)
const items = computed(() => store.getters["Item/items"]);

</script>