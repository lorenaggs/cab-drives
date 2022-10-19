import { createApp } from "vue";
import App from "./App.vue";

import PrimeVue from "primevue/config";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";

import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup"; //optional for column grouping
import Row from "primevue/row"; //optional for row

import Button from "primevue/button";

import FileUpload from "primevue/fileupload";

import "primevue/resources/themes/saga-blue/theme.css"; //theme
import "primevue/resources/primevue.min.css"; //core css
import "primeicons/primeicons.css"; //icons

const app = createApp(App);
app.use(PrimeVue);
app.component("Accordion", Accordion);
app.component("AccordionTab", AccordionTab);

app.component("DataTable", DataTable);
app.component("Column", Column);
app.component("ColumnGroup", ColumnGroup);
app.component("Row", Row);

app.component("Button", Button);
app.component("FileUpload", FileUpload);

app.mount("#app");
