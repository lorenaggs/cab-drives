<template>
  <div v-if="type === 'A'">A</div>
  <div v-else-if="type === 'B'">B</div>
  <div v-else-if="type === 'C'">C</div>
  <div v-else>Si no es A, B o C</div>

  <div class="hello">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button
            class="accordion-button"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseOne"
            aria-expanded="true"
            aria-controls="collapseOne"
          >
            Vehicles
          </button>
        </h2>
        <div
          id="collapseOne"
          class="accordion-collapse collapse show"
          aria-labelledby="headingOne"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Brand</th>
                  <th scope="col">Model</th>
                  <th scope="col">Year</th>
                  <th scope="col">Assignation</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="result in result" :key="result.id">
                  <th scope="row">{{ result.id }}</th>
                  <td>{{ result.brand }}</td>
                  <td>{{ result.model }}</td>
                  <td>{{ result.year }}</td>

                  <td>
                    <Button
                      :id="resultDrives.id"
                      label="Show drivers"
                      icon="pi pi-external-link"
                      @click="openBasic"
                    />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapseTwo"
            aria-expanded="false"
            aria-controls="collapseTwo"
          >
            Drives
          </button>
        </h2>
        <div
          id="collapseTwo"
          class="accordion-collapse collapse"
          aria-labelledby="headingTwo"
          data-bs-parent="#accordionExample"
        >
          <div class="accordion-body">
            <div class="accordion-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Assigned to</th>
                    <th scope="col">Range date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr
                    v-for="resultDrives in resultDrives"
                    :key="resultDrives.id"
                  >
                    <th scope="row">{{ resultDrives.id }}</th>
                    <td>{{ resultDrives.dni }}</td>
                    <td>{{ resultDrives.name }}</td>
                    <td>{{ resultDrives.lastName }}</td>
                    <td>{{ resultDrives.phone }}</td>
                    <td>
                      <Button
                        label="Show vehicles"
                        icon="pi pi-external-link"
                        @click="openModal"
                      />
                      <Dialog
                        header="Vehicles list"
                        v-model:visible="displayModal"
                        :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
                        :style="{ width: '50vw' }"
                        :modal="true"
                      >
                        <p class="m-0">
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit, sed do eiusmod tempor incididunt ut labore et
                          dolore magna aliqua. Ut enim ad minim veniam, quis
                          nostrud exercitation ullamco laboris nisi ut aliquip
                          ex ea commodo consequat. Duis aute irure dolor in
                          reprehenderit in voluptate velit esse cillum dolore eu
                          fugiat nulla pariatur. Excepteur sint occaecat
                          cupidatat non proident, sunt in culpa qui officia
                          deserunt mollit anim id est laborum.
                        </p>
                        <template #footer>
                          <Button
                            label="No"
                            icon="pi pi-times"
                            @click="closeModal"
                            class="p-button-text"
                          />
                          <Button
                            label="Yes"
                            icon="pi pi-check"
                            @click="closeModal"
                            autofocus
                          />
                        </template>
                      </Dialog>
                    </td>

                    <td>
                      <div class="field col-12 md:col-4">
                        <Calendar
                          inputId="range"
                          v-model="dates2"
                          selectionMode="range"
                          :manualInput="false"
                          :showIcon="true"
                        />
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <Dialog
    header="Drives list"
    v-model:visible="displayBasic"
    :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
    :style="{ width: '70vw' }"
  >
    <table class="table">
      <thead>
        <tr>
          <th scope="row">Assign to</th>
          <th scope="row">Range date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <Dropdown
            v-model="selectedCity1"
            :options="resultDrives"
            optionLabel="name"
            optionValue="id"
            placeholder="Select a Drive"
          />
          <td>
            <div class="field col-12 md:col-4">
              <Calendar
                :inputId="resultDrives.id"
                v-model="dates2"
                selectionMode="range"
                :manualInput="false"
                :showIcon="true"
              />
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <template #footer>
      <Button
        label="Cancel"
        icon="pi pi-times"
        @click="closeBasic"
        class="p-button-text"
      />
      <Button label="Save" icon="pi pi-check" @click="closeBasic" autofocus />
    </template>
  </Dialog>
</template>

<script>
import axios from "axios";

export default {
  name: "VehiclesDrives",
  data: () => ({
    type: "A",
    result: [],
    resultDrives: [],

    selectedCity1: null,

    date1: null,
    date2: null,
    date3: null,
    date4: null,
    date5: null,
    date6: null,
    date7: null,
    date8: null,
    date9: null,
    date10: null,
    date11: null,
    date12: null,
    date13: null,
    date14: null,
    dates1: null,
    dates2: null,
    minDate: null,
    maxDate: null,
    invalidDates: null,
    responsiveOptions: [
      {
        breakpoint: "1400px",
        numMonths: 2,
      },
      {
        breakpoint: "1200px",
        numMonths: 1,
      },
    ],

    display: false,

    displayBasic: false,
    displayBasic2: false,
    displayModal: false,
    displayResponsive: false,
    displayConfirmation: false,
    displayMaximizable: false,
    displayPosition: false,
    position: "center",
  }),

  created() {
    axios.get("http://127.0.0.1:8000/api/v1/vehicles").then((result) => {
      this.result = result.data.data;
    });
    axios.get("http://127.0.0.1:8000/api/v1/drivers").then((result) => {
      this.resultDrives = result.data.data;
    });
    {
      let today = new Date();
      let month = today.getMonth();
      let year = today.getFullYear();
      let prevMonth = month === 0 ? 11 : month - 1;
      let prevYear = prevMonth === 11 ? year - 1 : year;
      let nextMonth = month === 11 ? 0 : month + 1;
      let nextYear = nextMonth === 0 ? year + 1 : year;
      this.minDate = new Date();
      this.minDate.setMonth(prevMonth);
      this.minDate.setFullYear(prevYear);
      this.maxDate = new Date();
      this.maxDate.setMonth(nextMonth);
      this.maxDate.setFullYear(nextYear);

      let invalidDate = new Date();
      invalidDate.setDate(today.getDate() - 1);
      this.invalidDates = [today, invalidDate];
    }
  },

  methods: {
    openBasic() {
      console.log("ingresa");
      this.displayBasic = true;
    },
    closeBasic() {
      this.displayBasic = false;
    },
    openBasic2() {
      this.displayBasic2 = true;
    },
    closeBasic2() {
      this.displayBasic2 = false;
    },
    openResponsive() {
      this.displayResponsive = true;
    },
    closeResponsive() {
      this.displayResponsive = false;
    },
    openModal() {
      this.displayModal = true;
    },
    closeModal() {
      this.displayModal = false;
    },
    openConfirmation() {
      this.displayConfirmation = true;
    },
    closeConfirmation() {
      this.displayConfirmation = false;
    },
    openMaximizable() {
      this.displayMaximizable = true;
    },
    closeMaximizable() {
      this.displayMaximizable = false;
    },
    openPosition(position) {
      this.position = position;
      this.displayPosition = true;
    },
    closePosition() {
      this.displayPosition = false;
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}

.p-button {
  margin: 0.3rem 0.5rem;
  min-width: 10rem;
}

p {
  margin: 0;
}

.confirmation-content {
  display: flex;
  align-items: center;
  justify-content: center;
}

.p-dialog .p-button {
  min-width: 6rem;
}
</style>
