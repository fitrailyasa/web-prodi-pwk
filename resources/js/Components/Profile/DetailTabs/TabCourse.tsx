import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { Button } from '@heroui/react'

type TabCourseProps = {
    data: {
        courses: Array<{
            id: number
            name: string
            code: string
            credits: number
            description: string
            semester: string
        }>
    }
}

const TabCourse: React.FC<TabCourseProps> = ({ data }) => {
    return (
        <SectionTrigerScroll
            macControlCenter
            id="tab_course"
            className="bg-white p-5 rounded-3xl shadow-xl border-2"
        >
            <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue-light">
                Mata Kuliah yang Diajar
            </h2>

            {data.courses && data.courses.length > 0 ? (
                <div className="space-y-6">
                    {data.courses.map((course, index) => (
                        <div key={index} className="border-b pb-4">
                            <div className="flex justify-between items-start">
                                <div>
                                    <h3 className="font-semibold text-xl mb-1 text-main-blue-light">
                                        {course.name}
                                    </h3>
                                    <div className="text-main-blue-light text-sm mb-2">
                                        <span className="font-medium">
                                            Kode:
                                        </span>{' '}
                                        {course.code}
                                        <span className="mx-2">|</span>
                                        <span className="font-medium">
                                            SKS:
                                        </span>{' '}
                                        {course.credits}
                                        <span className="mx-2">|</span>
                                        <span className="font-medium">
                                            Semester:
                                        </span>{' '}
                                        {course.semester}
                                    </div>
                                    {course.description && (
                                        <p className="text-main-blue-light mt-2">
                                            {course.description}
                                        </p>
                                    )}
                                </div>
                            </div>
                        </div>
                    ))}
                </div>
            ) : (
                <p className="text-main-blue-light">
                    Belum ada data mata kuliah yang tersedia
                </p>
            )}
        </SectionTrigerScroll>
    )
}

export default TabCourse
