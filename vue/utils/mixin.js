import Auth from "@/utils/Auth";
export default {
    computed: {
        user() {
            return Auth.user();
        },
        Auth() {
            return Auth;
        }
    },
    methods: {}
};
