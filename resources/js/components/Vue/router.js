import Vue from 'vue';
import Router from 'vue-router';

import Home from './Pages/Home.vue';
import Add from './Pages/Add.vue';
import Series from './Pages/Series.vue';
import Movies from './Pages/Movies.vue';
import VisualComponent from './Pages/VisualComponent.vue';
import EditComponent from './Pages/EditComponent.vue';
import Search from './Pages/Search.vue';




Vue.use(Router);

export default new Router({
	mode:'history',
	routes:[
	{
		path:'/',
		name:'home',
		component:Home

	},{
		path:'/add',
		name:'add',
		component:Add
	},
	{
		path:'/series',
		name:'series',
		component:Series
	},
	{
		path:'/series/:id',
		name:'series/',
		component:VisualComponent
	},
	{
		path:'/:path/:id/edit',
		name:'SerieEdit',
		component:EditComponent
	},
	{
		path:'/movies',
		name:'movies',
		component:Movies
	},
	{
		path:'/movies/:id',
		name:'movies/',
		component:VisualComponent
	},
	{
		path:'/:path/:id/edit',
		name:'moviesEdit',
		component:EditComponent
	},
	{
		path:'/search/:key=:value',
		name:'Search',
		component:Search
	},

	]
});