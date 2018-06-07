<template>
  <div v-if="query.length > 0">
    <slot name="header"></slot>
    <slot name="default" v-for="(result, index) in results" :result="result" :index="index">
      {{index}}. Result 'id': {{ result.id }}
    </slot>
    <slot name="footer"></slot>
  </div>
</template>

<script>
import { Component } from 'vue-instantsearch';

export default {
  mixins: [Component],
  computed: {
    query() {
      return this.searchStore.query;
    },
    results() {
      console.log(this.searchStore.results);
      return this.searchStore.results;
    },
    
  }
};
</script>