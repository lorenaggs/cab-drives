<template>
  <h5>Programmatic</h5>
  <div class="pb-3">
    <Button @click="active = 0" class="p-button-text" label="Vehicles" />
    <Button @click="active = 1" class="p-button-text mr-2" label="Drives" />
  </div>

  <Accordion v-model:activeIndex="active">
    <AccordionTab header="Vehicles">
      <div>
        <DataTable :value="products" responsiveLayout="scroll">
          <Column field="code" header="Code"></Column>
          <Column field="name" header="Name"></Column>
          <Column field="category" header="Category"></Column>
          <Column field="quantity" header="Quantity"></Column>
          <Column field="quantity" header="Quantity"></Column>
        </DataTable>
      </div>
    </AccordionTab>
    <AccordionTab header="Drives">
      <p>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem
        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab
        illo inventore veritatis et quas architecto beatae vitae dicta sunt
        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
        odit aut fugit, sed quia consequuntur magni dolores eos qui ration
        voluptatem sequi nesciunt. Consectetur, adipisci velit, sed quia non
        numquam eius modi.
      </p>
    </AccordionTab>
  </Accordion>
</template>

<script>
export default {
  data() {
    return {
      active: 0,
    };
  },
  mounted() {
    this.products = [
      {
        id: "1000",
        code: "f230fh0g3",
        name: "Bamboo Watch",
        description: "Product Description",
        image: "bamboo-watch.jpg",
        price: 65,
        category: "Accessories",
        quantity: 24,
        inventoryStatus: "INSTOCK",
        rating: 5,
      },
    ];
  },
};
</script>

<style lang="scss" scoped>
.accordion-custom {
  i,
  span {
    vertical-align: middle;
  }

  span {
    margin: 0 0.5rem;
  }
}

.p-accordion p {
  line-height: 1.5;
  margin: 0;
}
</style>
