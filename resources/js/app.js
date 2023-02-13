// require('./bootstrap');
import { createApp } from "vue";
import router from "./router";
import Antd from "ant-design-vue";
import "ant-design-vue/dist/antd.css";
import store from "./store";
import Main from "./components/App.vue";
import {
  DashboardOutlined,
  MenuUnfoldOutlined,
  MenuFoldOutlined,
  FlagOutlined,
  UserOutlined,
  LockOutlined,
  PlusOutlined,
  EyeOutlined,
  EditOutlined,
  DeleteOutlined,
  SettingOutlined,
  ShopOutlined,
  FireOutlined,
  CloseCircleOutlined,
  HomeOutlined,
  AppstoreOutlined,
  ToolOutlined,
  MenuOutlined,
  CheckCircleOutlined,
  QuestionCircleOutlined,
  FormOutlined,
  RetweetOutlined,
  DownloadOutlined,
  CloudDownloadOutlined,
  DownOutlined,
} from "@ant-design/icons-vue";

const app = createApp(Main);

app.use(store);
app.use(router);
app.use(Antd);
app.component("UserOutlined", UserOutlined);
app.component("LockOutlined", LockOutlined);
app.component("DownOutlined", DownOutlined);
app.mount("#app");
