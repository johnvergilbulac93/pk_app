<template>
	<a-modal :visible="visible2" width="700px" :footer="null">
		<div class="mb-4">
			<a-button type="primary" @click="addPrice">Add</a-button>
		</div>
		<a-table :data-source="packing" bordered :columns="columns">
			<template #bodyCell="{ column, text, record }">
				<template v-if="column.key === 'operation'">
					<div class="flex gap-2 items-center">
						<a @click="showEditModal(record)">Edit</a>
						<a-popconfirm title="Sure to delete?" @confirm="onDelete(record.id)">
							<a>Delete</a>
						</a-popconfirm>
					</div>
				</template>
			</template>
		</a-table>
		<a-modal :visible="visible3" :title="editMode ? 'Update Price' : 'Add Price'" @cancel="visible3 = false"
			:footer="null">
			<a-form :layout="horizontal" labelAlign="left" v-bind="layout"
				@submit.prevent="editMode ? handleEdit() : handleAdd()">
				<a-form-item label="Group Code">
					<a-select  :options="all_price_groups" v-model:value="form.group_code"
						show-search option-filter-prop="label">
					</a-select>
				</a-form-item>
				<a-form-item label="Packing">
					<a-select :options="all_packing_per_items" v-model:value="form.packing"
						show-search option-filter-prop="label">
					</a-select>
				</a-form-item>
				<a-form-item label="Price">
					<a-input-number v-model:value="form.price"/>
				</a-form-item>
				<a-form-item :wrapper-col="{ offset: 4, span: 14 }">
					<a-button type="primary" html-type="submit">Submit</a-button>
				</a-form-item>
			</a-form>
		</a-modal>
	</a-modal>
</template>
<script setup>
import { ref, reactive, onMounted, computed } from 'vue';
import { useStore } from 'vuex';

const store = useStore()
const props = defineProps(['visible2', 'itemcode'])
const columns = [{
	title: 'Group Code',
	dataIndex: 'pck_pckds',
	key: 'pck_pckds',
	width: '30%',
},
{
	title: 'Packing',
	dataIndex: 'pck_pckqty',
	width: '20%',
	key: 'pck_pckqty',

	// dataIndex: 'itm_desc',
}, {
	title: 'Price',
	dataIndex: 'pck_pckqty',
	width: '20%',
	key: 'pck_pckqty',

	// dataIndex: 'itm_desc',
}, {
	title: 'Action',
	width: '20%',
	key: 'operation',
}];


const form = reactive({
	id: '',
	group_code: '',
	packing: '',
	price: ''
})
const layout = {
	labelCol: { span: 4 },
	wrapperCol: { span: 18 },
};
const visible3 = ref(false)
const editMode = ref(false)

const index = () => {

}
const addPrice = () => {
	visible3.value = true
	editMode.value = false

}
const handleAdd = () => {
	let payload = {
		itemcode: props.itemcode,
		description: form.packing,
		quantity: form.quantity
	}
	store.dispatch('Item/savePacking', payload).then(() => {
		visible2.value = false
		store.dispatch('Item/showPacking', { itemcode: props.itemcode })
	})
}

const handleEdit = () => {
	store.dispatch('Item/updatePacking', form).then(() => {
		visible2.value = false
		store.dispatch('Item/showPacking', { itemcode: props.itemcode })
	})
}
const onDelete = (id) => {
	console.log(id)
	store.dispatch('Item/deletePacking', id).then(() => {
		store.dispatch('Item/showPacking', { itemcode: props.itemcode })
	})
}
const showEditModal = (record) => {
	console.log(record)
	visible2.value = true
	editMode.value = true
	form.id = record.id
	form.packing = record.pck_pckds
	form.quantity = record.pck_pckqty

}

// const onUpdate
const packings = computed(() => store.getters["Item/packing"]);
const all_price_groups = computed(() => store.getters["Option/all_price_groups"]);
const all_packing_per_items = computed(() => store.getters["Option/all_packing_per_items"]);


</script>