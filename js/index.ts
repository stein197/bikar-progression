import ReactDOMClient from "react-dom/client";
import React from "react";
import App from "app/App";

document.addEventListener("DOMContentLoaded", () => {
    const main = document.querySelector("main")!;
    const root = ReactDOMClient.createRoot(main);
    root.render(React.createElement(App));
});