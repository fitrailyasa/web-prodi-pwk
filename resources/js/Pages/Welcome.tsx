import React from "react";
import AppLayout from "../Layouts/AppLayout";

type WelcomeProps = {
    name: string;
}

export default function Welcome({ name } : WelcomeProps) {
    const image = "/assets/img/logo.png";
    return (
        <AppLayout title={"welcome"}>
            <div className="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
                <p className="text-center text"> Wlecome </p>
                <p> {name} test </p>
                <img src={image} alt="test" />
            </div>
        </AppLayout>
    );
}
