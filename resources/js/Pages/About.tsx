import React from "react";
import AppLayout from "../Layouts/AppLayout";

interface AboutProps {
    name: string;
}

export default function About({ name }: AboutProps) {
    const image = "/assets/img/logo.png";
    return (
        <AppLayout title={"welcome"}>
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center tex"> abaut </p>
                <p> {name} test </p>
                <img src={image} alt="test" />
            </div>
        </AppLayout>
    );
}
