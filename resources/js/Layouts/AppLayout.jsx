import AppHead from "../Components/AppHead";
import NavBar from "../Components/NavBar";

export default function AppLayout({ title, children }) {
    return (
        <>
            <AppHead title={title} />
            <NavBar />
            {children}
        </>
    );
}
