import React from "react";
import Progression from "app/Progression";

export default function App(): React.ReactElement {
    return (
        <React.Fragment>
            <Progression title="Arithmetic Progression" url="/api/progression/arithmetic" fields={["start", "increment", "size"]} />
            <Progression title="Geometric Progression" url="/api/progression/geometric" fields={["start", "ratio", "size"]} />
            <Progression title="Fibonacci Progression" url="/api/progression/fibonacci" fields={["size"]} />
        </React.Fragment>
    );
}