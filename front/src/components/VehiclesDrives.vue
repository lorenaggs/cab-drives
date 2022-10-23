<template>
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
                <tr v-for="vehicle in vehicle" :key="vehicle.id">
                  <th scope="row">{{ vehicle.id }}</th>
                  <td>{{ vehicle.brand }}</td>
                  <td>{{ vehicle.model }}</td>
                  <td>{{ vehicle.year }}</td>

                  <td>
                    <Button
                      :id="vehicle.id"
                      label="Show drivers"
                      icon="pi pi-external-link"
                      @click="openBasic(vehicle.id)"
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
                  <tr v-for="drive in drive" :key="drive.id">
                    <th scope="row">{{ drive.id }}</th>
                    <td>{{ drive.dni }}</td>
                    <td>{{ drive.name }}</td>
                    <td>{{ drive.lastName }}</td>
                    <td>{{ drive.phone }}</td>
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
    header=""
    v-model:visible="displayBasic"
    :breakpoints="{ '960px': '75vw', '640px': '90vw' }"
    :style="{ width: '70vw' }"
  >
    <h2>Drives list</h2>

    <form>
      <table class="table">
        <thead>
          <tr>
            <th scope="row">Assign to</th>
            <th scope="row">Range date</th>
            <th scope="row"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <Dropdown
              v-model="form.driverId"
              :options="drive"
              optionLabel="name"
              optionValue="id"
              placeholder="Select a Drive"
            />
            <td>
              <div class="field col-12 md:col-4">
                <Calendar
                  :inputId="drive.id"
                  v-model="form.date"
                  selectionMode="range"
                  :manualInput="false"
                  :showIcon="true"
                  dateFormat="yy-dd-mm"
                />
              </div>
            </td>
            <td>
              <span class="p-buttonset">
                <Button
                  v-on:click="guardar()"
                  label="to assign"
                  icon="pi pi-check"
                />
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
    <template #footer>
      <Button label="Close" icon="pi pi-check" @click="closeBasic" autofocus />
    </template>

    <h2>Assignment history</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Id Vehicle</th>
          <th scope="row">Id driver</th>
          <th scope="row">DNI</th>
          <th scope="row">Name</th>
          <th scope="row">Lastname</th>
          <th scope="row">Phone</th>
          <th scope="row">Date init</th>
          <th scope="row">Date end</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="assignmentHistory in assignmentHistory"
          :key="assignmentHistory.id"
        >
          <th scope="row">{{ assignmentHistory.vehicleId }}</th>
          <td>{{ assignmentHistory.driver.id }}</td>
          <td>{{ assignmentHistory.driver.dni }}</td>
          <td>{{ assignmentHistory.driver.name }}</td>
          <td>{{ assignmentHistory.driver.lastName }}</td>
          <td>{{ assignmentHistory.driver.phone }}</td>
          <td>
            {{
              new Date(assignmentHistory.dateInit * 1000).toLocaleDateString(
                "en-US"
              )
            }}
          </td>
          <td>
            {{
              new Date(assignmentHistory.dateEnd * 1000).toLocaleDateString(
                "en-US"
              )
            }}
          </td>
        </tr>
      </tbody>
    </table>
  </Dialog>
</template>

<script>
import axios from "axios";
import { $api } from "./Services/Api";

export default {
  name: "VehiclesDrives",
  data: () => ({
    apiServices: $api.apiService,
    form: { driverId: "", date: "", vehicleId: "" },

    vehicle: [],
    drive: [],
    assignmentHistory: [],

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

  async created() {
    this.vehicle = await this.apiServices.getVehicles();

    this.drive = await this.apiServices.getDrives();

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
    openBasic(id) {
      axios
        .get(
          `http://127.0.0.1:8000/api/v1/assignations?vehicleId[eq]=${id}&includeDrivers=true`
        )
        .then((result) => {
          this.assignmentHistory = result.data.data;
        });

      this.displayBasic = true;
      this.form.vehicleId = id;
    },
    closeBasic() {
      this.displayBasic = false;
    },
    openModal() {
      this.displayModal = true;
    },
    closeModal() {
      this.displayModal = false;
    },

    guardar() {
      const dataDriver = {
        driverId: this.form.driverId,
        vehicleId: this.form.vehicleId,
        dateInit: Math.floor(this.form.date[0].getTime() / 1000),
        dateEnd: Math.floor(this.form.date[1].getTime() / 1000),
      };

      axios
        .post("http://127.0.0.1:8000/api/v1/assignations", dataDriver)
        .then((data) => {
          console.log(data);
          axios
            .get(
              `http://127.0.0.1:8000/api/v1/assignations?vehicleId[eq]=${dataDriver.vehicleId}&includeDrivers=true`
            )
            .then((result) => {
              this.assignmentHistory = result.data.data;
            });
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
