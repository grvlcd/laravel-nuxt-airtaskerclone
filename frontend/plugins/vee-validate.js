import Vue from "vue";
import { ValidationProvider, ValidationObserver, extend } from "vee-validate";
import { required, email } from "vee-validate/dist/rules";
Vue.component("ValidationProvider", ValidationProvider);
Vue.component("ValidationObserver", ValidationObserver);

extend("required", {
  ...required,
  message: "Field is required"
});

extend("email", {
  ...email,
  message: "Field must be a valid email."
});
