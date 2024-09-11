import React from "react";
import Field from "app/Field";

type Props = {
    title: string;
    url: string;
    fields: string[];
};

export default function Progression(props: Props): React.ReactElement {
    const ref = React.useRef<HTMLFormElement>(null);
    const [result, setResult] = React.useState<string | null>(null);
    const [error, setError] = React.useState<string | null>(null);
    const onClick = React.useCallback((event: React.SyntheticEvent) => {
        event.preventDefault();
        if (ref.current == null)
            return;
        // TODO: Not a good way to collect data in React
        const data = new FormData(ref.current);
        const query = new URLSearchParams(data as any);
        fetch(props.url + "?" + query.toString()).then(result => result.json()).then(data => {
            if (data.error) {
                setError(data.msg);
                setResult(null);
            } else {
                setError(null);
                setResult(JSON.stringify(data.data));
            }
        });
    }, [ref.current, setResult, setError]);
    
    return (
        <section className="mb-3">
            <div className="container">
                <p className="h2">{props.title}</p>
                <form ref={ref}>
                    {props.fields.map(name => (
                        <Field key={name} name={name} />
                    ))}
                    <button type="submit" className="btn btn-primary my-3" onClick={onClick}>Submit</button>
                    {error && (
                        <p className="alert alert-danger">{error}</p>
                    )}
                    {result && (
                        <p className="alert alert-success">{result}</p>
                    )}
                </form>
            </div>
        </section>
    );
}