import "./bootstrap";
import "../css/app.css";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import AOS from "aos";
import "aos/dist/aos.css";
import { OhVueIcon, addIcons } from "oh-vue-icons";
import {
    BiPersonFill,
    IoNotificationsSharp,
    MdFolder,
    ViFileTypePdf2,
    MdFolderoffSharp,
    IoNotifications,
    IoArrowBack,
    MdDeleteRound,
    FcFile,
    RiMedalFill,
} from "oh-vue-icons/icons";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios'
import VueAxios from 'vue-axios'

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(VueSweetalert2)
            .use(VueAxios, axios)
            .component("v-icon", OhVueIcon)
            .mount(el)
    },
});

AOS.init();
addIcons(
    BiPersonFill,
    IoNotificationsSharp,
    MdFolder,
    ViFileTypePdf2,
    MdFolderoffSharp,
    IoNotifications,
    IoArrowBack,
    MdDeleteRound,
    FcFile,
    RiMedalFill,
    
);
// InertiaProgress.init({ color: "blue" });
InertiaProgress.init({
    // The delay after which the progress bar will
    // appear during navigation, in milliseconds.
    delay: 250,

    // The color of the progress bar.
    color: "#29d",

    // Whether to include the default NProgress styles.
    includeCSS: true,

    // Whether the NProgress spinner will be shown.
    showSpinner: false,
});
