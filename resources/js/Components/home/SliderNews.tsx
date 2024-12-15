import { AnimatePresence, motion } from 'framer-motion'
import { wrap } from 'popmotion'
import React, { useEffect, useImperativeHandle, useState } from 'react'

const variants = {
    enter: (direction: number) => ({
        x: direction > 0 ? 1000 : -1000,
        opacity: 0
    }),
    center: {
        zIndex: 1,
        x: 0,
        opacity: 1
    },
    exit: (direction: number) => ({
        zIndex: 0,
        x: direction < 0 ? 1000 : -1000,
        opacity: 0
    })
}

const swipeConfidenceThreshold = 10000
const swipePower = (offset: number, velocity: number) => {
    return Math.abs(offset) * velocity
}

interface SliderProps {
    children: React.ReactNode[]
    autoSlide?: boolean
    interval?: number
    getPageIndicator?: (component: React.ReactNode) => void
    className?: String
}

export const SliderNews = React.forwardRef<
    { sliderFunction: (newDirection: number) => void },
    SliderProps
>(
    (
        { children, autoSlide = false, interval, getPageIndicator, className },
        ref
    ) => {
        const [[page, direction], setPage] = useState<[number, number]>([0, 0])
        const pageIndex = wrap(0, children.length, page)
        const paginate = (newDirection: number) => {
            return setPage([page + newDirection, newDirection])
        }

        const pageIndicator = (
            <>
                {Array.from({ length: children.length }).map((_, index) => (
                    <button
                        key={index}
                        onClick={() => setPage([index, index - pageIndex])}
                        className={`w-3 h-3 rounded-full cursor-pointer ${
                            index === pageIndex
                                ? 'bg-gray-700'
                                : 'bg-transparent border border-gray-700'
                        }`}
                    />
                ))}
            </>
        )
        useEffect(() => {
            getPageIndicator && getPageIndicator(pageIndicator)
            if (!autoSlide) return
            const autoSlider = setInterval(
                () => {
                    paginate(1)
                },
                interval ? interval * 1000 : 5000
            )

            return () => clearInterval(autoSlider)
        }, [pageIndex])

        useImperativeHandle(ref, () => ({
            sliderFunction: paginate
        }))

        return (
            <div className={`w-full relative ${className}`}>
                <AnimatePresence initial={false} custom={direction}>
                    <motion.div
                        key={page}
                        custom={direction}
                        variants={variants}
                        initial="enter"
                        animate="center"
                        exit="exit"
                        transition={{
                            x: {
                                type: 'spring',
                                stiffness: 300,
                                damping: 30
                            },
                            opacity: { duration: 0.2 }
                        }}
                        drag="x"
                        dragConstraints={{ left: 0, right: 0 }}
                        dragElastic={1}
                        onDragEnd={(e, { offset, velocity }) => {
                            const swipe = swipePower(offset.x, velocity.x)

                            if (swipe < -swipeConfidenceThreshold) {
                                paginate(1)
                            } else if (swipe > swipeConfidenceThreshold) {
                                paginate(-1)
                            }
                        }}
                        className="w-full absolute"
                    >
                        {children[pageIndex]}
                    </motion.div>
                </AnimatePresence>
            </div>
        )
    }
)
