<template>
	<div>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <router-link class="navbar-brand" to="/">Imbd</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <router-link class="nav-link" to="/add">Add </router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/series">Series</router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/movies">Movies</router-link>
      </li>
     </ul>
     <span class="navbar-text mx-auto">
    RestApi with Laravel and Vuejs
  </span>
    <form class="form-inline my-2 my-lg-0" v-on:submit.prevent >
      <select  class="form-control"  v-model="option">
        <option v-for="key in keys" :value="key">{{key}}</option>
      </select>
      <input class="form-control mr-sm-2" type="Search" placeholder="Search" @input="search=$event.target.value" :value="search"  >
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" @click="submit">Search</button>
      
    </form>
  </div>
</nav>
	</div>
</template>

<script>
export default {

  name: 'HeaderComponent',

  data () {
    return {
      search:'',
      keys:['Title','Release','Category','Rating'],
      option:'Title',
     
    }
  },
  
  methods:{
    
   
    submit(){
    if(this.$route.params.key != this.option && this.$route.params.value != this.search  )
      this.$router.push({name:'Search',params:{key:this.option.toLowerCase(),value:this.search}})
    }
    
  },
  

}



</script>

