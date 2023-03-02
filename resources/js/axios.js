import axios from "axios";
import router from "./router";
// import store from "./index";
import swal from "sweetalert2";
// import { type } from "jquery";

// axios.defaults.withCredentials = true;

const axiosRequest = axios.create({
  baseURL: "/api/",
  // timeout: 20000,
  // withCredentials: true,
  // headers: {
  //   Authorization: `Bearer ${window.localStorage.getItem("PK_TOKEN")}`,
  //   // account: window.localStorage.getItem("selectedAccount"),
  //   // accountIndex: window.localStorage.getItem("accountIndex")
  // },
});

// RESPONSE
// Add a response interceptor
axiosRequest.interceptors.response.use(
  function (response) {
    // Do something with response data
    // console.log(response);
    if (response.status == 201) {
      swal.fire({
        title: "Success",
        text: response.data.message,
        icon: "success",
        confirmButtonText: "OK",
      });
    }
    //     } else if (response.status == 202) {
    //       swal.fire({
    //         title: "Success",
    //         text: response.data.message,
    //         icon: "success",
    //         confirmButtonText: "OK",
    //       });
    //     } else if (response.status == 204) {
    //       swal.fire({
    //         title: "Success",
    //         text: response.data.message,
    //         icon: "success",
    //         confirmButtonText: "OK",
    //       });
    //     }
    return response;
  },
  function (error) {
    // Do something with response error

    if (error.response.status == 401) {
      // store.commit("SET_ERROR", 401);
      router.push("/login");
      swal.fire({
        title: "Session Expired.",
        text: "Please login again.",
        icon: "error",
        confirmButtonText: "OK",
      });
    }
    if (error.response.status == 422) {
      const item = error.response.data.errors;
      let results = "";
      for (const key in item) {
        results += `${item[key]}<br>`;
        //console.log(`${key}: ${item[key]}`);
      }
      const errors = Object.keys(error.response.data.errors);
      swal.fire({
        title: error.response.data.message,
        icon: "error",
        html: results,
        confirmButtonText: "OK",
      });
      // console.log(error.response.data);
      // store.commit("SET_ERROR", 422);
    }

    if (error.response.status == 500) {
      swal.fire({
        title: "Server Error",
        text: "Internal server error occurred. Please try again later.",
        icon: "error",
        confirmButtonText: "OK",
      });
      // console.log(error.response.data)
      // store.commit("SET_ERROR", 422);
    }

    //     if (error.response.status == undefined) {
    //       router.push("/login");
    //     }

    return Promise.reject(error);
  }
);

let Http = function () {
  let token = localStorage.getItem("PK_TOKEN");

  if (token) {
    axiosRequest.defaults.headers.common["Authorization"] = `Bearer ${token}`;
  }

  return axiosRequest;
};

export default Http;
// function else if() {
//     throw new Error("Function not implemented.");
// }
