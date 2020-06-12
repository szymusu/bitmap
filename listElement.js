class ListElement
{
    id;
    author;
    authEl
    description;
    descEl;
    element;
    button;

    constructor(obj)
    {
        this.id = obj.id;
        this.author = obj.author;
        this.description = obj.description;

        this.element = document.createElement("TR");
        document.getElementById("list").appendChild(this.element);

        this.authEl = document.createElement("TD");
        this.authEl.innerHTML = this.author;
        this.authEl.className = "listcell";
        this.element.appendChild(this.authEl);

        this.descEl = document.createElement("TD");
        this.descEl.innerHTML = this.description;
        this.descEl.className = "listcell";
        this.element.appendChild(this.descEl);

        this.button = document.createElement("TD");
        this.button.className = "button";
        this.button.innerHTML = "Wczytaj";
        this.button.onclick = this.Clicked;
        this.element.appendChild(this.button);
        this.button.id = obj.id;
    }

    Clicked()
    {
        ReadFromJSON(this.id);
    }
}