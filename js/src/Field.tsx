import React from "react";

type Props = {
    name: string;
    onChange?(value: string): void;
};

export default function Field(props: Props): React.ReactElement {
    const [value, setValue] = React.useState<string>();
    const onChange = React.useCallback((event: React.SyntheticEvent) => {
        const value = (event.nativeEvent.target as any).value as string;
        setValue(value);
        props.onChange?.(value);
    }, [setValue]);
    return (
        <div className="form-group">
            <label>{props.name}</label>
            <input type="text" name={props.name} className="form-control" placeholder={props.name} value={value} onChange={onChange} />
        </div>
    );
}