import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@nextui-org/react'

type TabCourseProps = {
    data: any
}

const TabCourse: React.FC<TabCourseProps> = ({ data }) => {
    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Course"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3">
                    Kelompok Keahliasn
                </h2>
                <p className="">Lorem ipsum dolor sit.</p>

                <h2 className="mt-10 font-bold text-3xl pb-4 border-b mb-3">
                    Matakuliah Yang di Ampu
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

export default TabCourse
