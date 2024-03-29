---
id: vrvz9
title: Front-End with Vue
file_version: 1.1.2
app_version: 1.4.5
---

# Overview

This documentation is about explaining how Vue works in our system. We choose Vue and Tailwind as front-end frameworks. We also select Single Page Application techniques by combining the front end with Inertia.

# Entry Point

The entry point of app is `📄 resources/js/app.js`. This is where we mount our application.

# Main Page

The main page is `📄 resources/js/Pages/Core.vue`. From here, we use main layout, before breaking it to smaller layouts. Below is the explanation of how the code works

<br/>

Line 2<br/>
We import Head using Inertia to pass head meta

Line 3<br/>
To use default layout, we need to import Layout

Line 5<br/>
This is the plugin if we want to use persistent Layout

Line 7<br/>
We define properties here before passing it down to template below
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 resources/js/Pages/Core.vue
```vue
1      <script setup>
2      import {Head, router} from "@inertiajs/vue3";
3      import Pagination from '@/Components/Pagination.vue'
4      import {ref,watch} from "vue";
5      import {debounce} from "lodash";
6      
7      const props = defineProps({
8          cores:{
9              type: Object,
10             default: () => ({}),
11         },
12         filters: {
13             type: Object,
14             default: () => ({}),
15         },
16     })
17     
18     let search = ref(props.filters.search);
19     
20     watch(search,debounce(function (value){
21         router.get(
22             '/',
23             { search: value },
24             {
25                 preserveState: true,
26                 replace:true
27             })
28     },300));
29     </script>
```

<br/>

This file was generated by Swimm. [Click here to view it in the app](/repos/Z2l0aHViJTNBJTNBaW1wcm9mZGJ2dWUlM0ElM0FtZGF6cmlu/docs/vrvz9).
