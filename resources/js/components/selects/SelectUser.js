export default ({api, old}) => ({

    open: false,

    label: '',
    value: null,

    items: [],
    showing: 0,
    search: '',

    async init() {
        this.items = await (await fetch(api)).json();

        if(old !== undefined) {
            const tmp = this.items.filter(i => i.id == old);

            this.value = tmp[0].id;
            this.label = tmp[0].name;
        }
    },

    toggle() {
        this.open = !this.open;
    },

    selectItem(value, label = value) {
        this.value = value;
        this.label = label;
        this.open = false;
    },

    get filteredItems() {
        const tmp = this.items.filter(i => i.name.toLowerCase().startsWith(this.search.toLowerCase()));
        this.showing = tmp.length;

        return tmp;
    }
})
