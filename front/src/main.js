import "bootstrap/dist/css/bootstrap.css";

import { createApp } from "vue";
import App from "./App.vue";

import "@fortawesome/fontawesome-free/css/all.css";

import "bootstrap/dist/js/bootstrap.js";

import PrimeVue from "primevue/config";
import "primevue/resources/themes/saga-blue/theme.css";
import "primevue/resources/primevue.css";
import "primeicons/primeicons.css";
import Calendar from "primevue/calendar";
import Dialog from "primevue/dialog";
import Button from "primevue/button";
import RadioButton from "primevue/radiobutton";
import DynamicDialog from "primevue/dynamicdialog";
import Dropdown from "primevue/dropdown";

import ConfirmationService from "primevue/confirmationservice";

import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";

const app = createApp(App);
app.use(PrimeVue);
app.use(Calendar);
app.use(Dialog);
app.use(Button);
app.use(RadioButton);
app.use(DynamicDialog);
app.use(ConfirmationService);
app.use(VueSweetalert2);


app.mount("#app");

app.component("Calendar", Calendar);
app.component("Dialog", Dialog);
app.component("Button", Button);
app.component("RadioButton", RadioButton);
app.component("DynamicDialog", DynamicDialog);
app.component("Dropdown", Dropdown);
app.component("ConfirmationService", ConfirmationService);
