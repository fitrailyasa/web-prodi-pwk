import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@nextui-org/react'

type TabPublicationProps = {
    data: any
}

const TabPublication: React.FC<TabPublicationProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Publication"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Penelitian
                </h2>
                <p className="">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Publication"
                className="bg-white p-5 mt-10 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Publikasi
                </h2>
                <p className="">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Publication"
                className="bg-white p-5 mt-10 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Pengabdian
                </h2>
                <p className="">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
            </SectionTrigerScroll>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Publication"
                className="bg-white p-5 mt-10 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    HKI & Lisensi
                </h2>
                <p className="">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
            </SectionTrigerScroll>
        </>
    )
}

export default TabPublication
