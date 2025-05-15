import { SectionTrigerScroll } from '@/Animation/SectionDebounceAnimation'
import { useTranslation } from '@/Hooks/useTranslation'

type TabOtherProps = {
    data: {
        other?: string
    }
}

const TabOther: React.FC<TabOtherProps> = ({ data }) => {
    const otherTitle = useTranslation('Lain Lain')
    const placeholderText = useTranslation('Belum ada data lain yang tersedia')

    return (
        <>
            <SectionTrigerScroll
                macControlCenter
                id="tab_Other"
                className="bg-white p-5 rounded-3xl shadow-xl border-2"
            >
                <h2 className="font-bold text-3xl pb-4 border-b mb-3 text-main-blue-light">
                    {otherTitle}
                </h2>
                {data.other ? (
                    <div className="text-main-blue-light whitespace-pre-wrap">
                        {data.other}
                    </div>
                ) : (
                    <p className="text-main-blue-light">{placeholderText}</p>
                )}
            </SectionTrigerScroll>
        </>
    )
}

export default TabOther
