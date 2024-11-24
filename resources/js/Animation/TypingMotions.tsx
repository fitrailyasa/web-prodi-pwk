import { motion } from 'framer-motion'
import { useState } from 'react'

interface TypingAnimationProps {
    text: string
    speed?: number
    ishover?: boolean
    isrightBorder?: boolean
    isBorderLeft?: boolean
    className?: string
}

export const TypingAnimation: React.FC<TypingAnimationProps> = ({
    text,
    speed = 0.1,
    ishover = false,
    isrightBorder = false,
    isBorderLeft = false,
    ...props
}) => {
    const [hasHovered, setHasHovered] = useState(false)
    const [key, setKey] = useState(0)

    const textArray = Array.from(text)

    const handleHoverStart = () => {
        if (ishover && !hasHovered) {
            setKey(prev => prev + 1)
            setHasHovered(true)
        }
    }

    const handleHoverEnd = () => {
        if (ishover) {
            setHasHovered(false)
        }
    }

    return (
        <motion.p
            key={key}
            style={{
                display: 'inline-block',
                whiteSpace: 'pre',
                overflow: 'hidden',
                paddingLeft: '3px',
                borderRight: isrightBorder ? '2px solid ' : 'none',
                borderLeft: isBorderLeft ? '2px solid ' : 'none',
                cursor: 'pointer'
            }}
            className={props.className}
            initial={{ width: 0 }}
            animate={{ width: '100%' }}
            transition={{
                duration: text.length * speed,
                ease: 'linear'
            }}
            onHoverStart={handleHoverStart}
            onHoverEnd={handleHoverEnd}
        >
            {textArray.map((char, index) => (
                <motion.span
                    key={index}
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ delay: index * speed }}
                >
                    {char}
                </motion.span>
            ))}
        </motion.p>
    )
}
