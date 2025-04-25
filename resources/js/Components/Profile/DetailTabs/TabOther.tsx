import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@heroui/react'

type TabOtherProps = {
    data: any
}

const TabOther: React.FC<TabOtherProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Other"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue">
                    Lain Lain
                </h2>
                <p className="text-main-blue">
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Rerum nulla esse quod ab quis ipsa a, dicta at numquam iusto
                    corporis?"
                </p>
            </SectionTrigerScroll>
        </>
    )
}

export default TabOther
