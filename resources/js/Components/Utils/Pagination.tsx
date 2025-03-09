import {
    cn,
    Pagination,
    PaginationItemType,
    PaginationItemRenderProps
} from '@heroui/react'
import { SVGProps } from 'react'
import { JSX } from 'react/jsx-runtime'

export const ChevronIcon = (
    props: JSX.IntrinsicAttributes & SVGProps<SVGSVGElement>
) => {
    return (
        <svg
            aria-hidden="true"
            fill="none"
            focusable="false"
            height="1em"
            role="presentation"
            viewBox="0 0 24 24"
            width="1em"
            {...props}
        >
            <path
                d="M15.5 19l-7-7 7-7"
                stroke="currentColor"
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="1.5"
            />
        </svg>
    )
}

type DataPagienation = {
    current_page: number
    page_url: string
    las_page: number
    total: number
}

export default function PaginationComponent(DataPagination: DataPagienation) {
    const renderItem = ({
        ref,
        key,
        value,
        isActive,
        onNext,
        onPrevious,
        setPage,
        className
    }: PaginationItemRenderProps) => {
        if (value === PaginationItemType.NEXT) {
            return (
                <button
                    key={key}
                    className={cn(
                        className,
                        'bg-default-200/50 min-w-8 w-8 h-8'
                    )}
                    onClick={onNext}
                >
                    <ChevronIcon className="rotate-180" />
                </button>
            )
        }

        if (value === PaginationItemType.PREV) {
            return (
                <button
                    key={key}
                    className={cn(
                        className,
                        'bg-default-200/50 min-w-8 w-8 h-8'
                    )}
                    onClick={onPrevious}
                >
                    <ChevronIcon />
                </button>
            )
        }

        if (value === PaginationItemType.DOTS) {
            return (
                <button key={key} className={className}>
                    ...
                </button>
            )
        }

        return (
            <button
                key={key}
                ref={ref}
                className={cn(
                    className,
                    isActive &&
                        'text-white bg-gradient-to-br from-indigo-500 to-pink-500 font-bold'
                )}
                onClick={() => setPage(value)}
            >
                {value}
            </button>
        )
    }

    const handLeMovePage = (page: number) => {
        window.location.href = DataPagination.page_url + '?page=' + page
    }

    return (
        <div className="flex flex-col items-center mt-5">
            <p className="text-center">
                Total Item <span>: {DataPagination.total}</span>
            </p>
            {/* <div className="flex justify-center"> */}
            <Pagination
                disableCursorAnimation
                showControls
                className="gap-2"
                initialPage={DataPagination.current_page}
                radius="full"
                renderItem={renderItem}
                total={DataPagination.las_page}
                page={DataPagination.current_page}
                onChange={page => handLeMovePage(page)}
                variant="light"
            />
            {/* </div> */}
        </div>
    )
}
